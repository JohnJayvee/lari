<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use Storage;
use App\Events\NewMessage;

class AdsController extends Controller
{
    protected $moduleId;

    public function __construct() {
        $this->moduleId = 6;
    }

    public function show(Request $request) {
        $data['mid'] = $this->moduleId;

        $data['ads'] = DB::table('adstable')
            ->select(
                'adstable.adsid',
                'adstable.adstitle',
                'adstable.adsfilename',
                'adstable.adsfilesize',
                'adstable.DateUploaded',
                )
            ->orderBy('adstable.DateUploaded','ASC')
            ->paginate(10);

        // Format file sizes
        foreach ($data['ads'] as $ad) {
            $ad->adsfilesize = $this->formatFileSize($ad->adsfilesize);
        }


        event(new NewMessage('asdasdas'));


        return view('ads.ads', $data);
    }


    public function delete(Request $request) {
        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.unhashedpassword', '=', $request->unhashedpassword)
            ->first();

        if($data['confirm']) {    
            $filename =  DB::table('adstable')
                ->where('adstable.adsid', '=', $request->id)
                ->first(); 

    
            $filePath = 'uploads/'.$filename->AdsFilename; // Replace with the path to your file


            // dd($filePath);

            try {
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                    
                    $data['delete'] =  DB::table('adstable')
                        ->where('adstable.adsid', '=', $request->id)
                        ->delete();

                        return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Deleted!']);
                } else {
                        return redirect()->back()->with(['success' => 1, 'title' => 'Warning', 'message' => 'File not found!']);
                }
            } catch (FileNotFoundException $e) {
                    return redirect()->back()->with(['success' => 1, 'title' => 'Warning', 'message' => 'Some Error accured !'.$e]);
            }


        }else
            return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);

    }

    

    public function update(Request $request) {
        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.userlevel', 1)
            ->where('userstable.unhashedpassword',$request->unhashedpassword)
            ->first();

            if($data['confirm']) {  
                $request->validate([
                    'adsfilename' => 'required|file|mimes:jpeg,png,mp4', 
                ]);

                if ($request->hasFile('adsfilename') && $request->file('adsfilename')->isValid()) {
                    $file = $request->file('adsfilename');
                    $fileName = time() . '_' . $file->getClientOriginalName();
        
                    $data['update'] =  DB::table('adstable')
                        ->where('adsid','=', $request->id)
                        ->update([
                            'adstitle' => $request->adstitle,
                            'adsfilename' => $fileName,
                            'adsfilesize' => $file->getSize(),
                            'dateuploaded' => now()->format('Y-m-d'),
                            'uploadedby' => Auth::user()->UserID,
                        ]);
        
                    try {
                        $file->storeAs('uploads', $fileName, 'public');
                        return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Updated!']);
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', 'Failed to upload file.');
                    }  
        
                } else { 

                    return redirect()->back()->with(['warning' => 1,'title' => 'Error!', 'message' => 'Invalid Media Format make sure that the video or picture in in this format *.mp4, *.jpg/.jpeg/.png!']);
                }
            }

                return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);
    }


    public function create(Request $request) {
        $data['confirm'] =  DB::table('userstable')
        ->where('userstable.userlevel', 1)
        ->where('userstable.unhashedpassword',$request->unhashedpassword)
        ->first();


    if($data['confirm']) {  
        $request->validate([
            'adsfilename' => 'required|file|mimes:jpeg,png,mp4', 
        ]);

        if ($request->hasFile('adsfilename') && $request->file('adsfilename')->isValid()) {
            $file = $request->file('adsfilename');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $data['update'] =  DB::table('adstable')
                ->insert([
                    'adstitle' => $request->adstitle,
                    'adsfilename' => $fileName,
                    'adsfilesize' => $file->getSize(),
                    'dateuploaded' => now()->format('Y-m-d'),
                    'uploadedby' => Auth::user()->UserID,
                ]);


            try {
                $file->storeAs('uploads', $fileName, 'public');
                return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Uploaded!']);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to upload file.');
            }  

        } else {      
            return redirect()->back()->with(['warning' => 1,'title' => 'Error!', 'message' => 'Invalid Media Format make sure that the video or picture in in this format *.mp4, *.jpg/.jpeg/.png!']);
        }
    }
        return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);

    }


    
    public function add(Request $request) {
        return view('ads.add_modal');
    }



    public function confirm(Request $request) {
        $data['id'] = $request->id;
        $data['action'] = route('ads.delete');
        $data['message'] = 'Do you want to delete?';
        return view('modals.modal_security_code',$data);
    }



    public function edit(Request $request) {
        $data['ads'] = DB::table('adstable')
            ->select(
                'adstable.adsid',
                'adstable.adstitle',
                'adstable.adsfilename',
                )
            ->where('adstable.adsid', '=', $request->id)
            ->first();


       if($data['ads'] ) {
            return view('ads.edit_modal', $data);
        }
            return response()->json(['failed' => 1,'message' => 'Failed to fetch.'],500);
    }

    

    
    public function search(Request $request) {
        $search = $request->query('query');
        $data['ads'] = DB::table('usersplantable')
            ->select(
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                )
            ->where('usersplantable.plantitle', 'like', '%' . $search . '%')
            ->orderBy('usersplantable.planid','ASC')
            ->paginate(10);

        return view('ads.ads', $data);
    }


    // Function to convert file size to MB, GB, KB, or bytes
    private function formatFileSize($fileSizeInBytes)
    {
        if ($fileSizeInBytes >= 1073741824) {
            return round($fileSizeInBytes / 1073741824, 2) . ' GB';
        } elseif ($fileSizeInBytes >= 1048576) {
            return round($fileSizeInBytes / 1048576, 2) . ' MB';
        } elseif ($fileSizeInBytes >= 1024) {
            return round($fileSizeInBytes / 1024, 2) . ' KB';
        } else {
            return $fileSizeInBytes . ' bytes';
        }
    }

}
