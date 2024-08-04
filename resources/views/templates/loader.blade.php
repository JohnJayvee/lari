
<style>

#loader {
    position: absolute;
    background: #ffffff9e;
    width: 100%;
    height: 100vh;
    display: flex;
    z-index: 99999;
}

/* :root {
  --hue: 223;
  --bg: hsl(var(--hue),90%,90%);
  --fg: hsl(var(--hue),90%,10%);
  --primary: hsl(var(--hue),90%,50%);
  --trans-dur: 0.3s;
  font-size: calc(16px + (32 - 16) * (100vw - 320px) / (2560 - 320));
} */
:root {
--primary: hsl(var(--hue),90%,50%);
}
.ping-pong {
  display: block;
  margin: auto;
  width: 8em;
  height: 8em;
}
.ping-pong__ball-x, .ping-pong__ball-y, .ping-pong__paddle-x, .ping-pong__paddle-y {
  animation: ping-pong-ball-x 1.5s linear infinite;
}
.ping-pong__ball-y {
  animation-name: ping-pong-ball-y;
}
.ping-pong__paddle-x {
  animation-name: ping-pong-paddle-x;
  animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1);
}
.ping-pong__paddle-y {
  animation-name: ping-pong-paddle-y;
}

/* Dark theme */
@media (prefers-color-scheme: dark) {
  :root {
    --bg: hsl(var(--hue),90%,10%);
    --fg: hsl(var(--hue),90%,90%);
  }
}
/* Animation */
@keyframes ping-pong-ball-x {
  from, to {
    transform: translate(40px, 80px);
  }
  50% {
    transform: translate(88px, 80px);
  }
}
@keyframes ping-pong-ball-y {
  from, 50%, to {
    animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1);
    transform: translate(0, 0);
  }
  25%, 75% {
    animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0);
    transform: translate(0, -68px);
  }
}
@keyframes ping-pong-paddle-x {
  from, to {
    transform: translate(36px, 92px) rotate(6deg);
  }
  50% {
    transform: translate(92px, 92px) rotate(-6deg);
  }
}
@keyframes ping-pong-paddle-y {
  from, 50%, to {
    animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1);
    transform: translate(0, 0);
  }
  25%, 75% {
    animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0);
    transform: translate(0, 28px);
  }
} */

</style>
<div id="loader" >
    <svg class="ping-pong" viewBox="0 0 128 128" width="128px" height="128px">
        <defs>
            <linearGradient id="ping-pong-grad" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0%" stop-color="#000"></stop>
                <stop offset="100%" stop-color="#fff"></stop>
            </linearGradient>
            <mask id="ping-pong-mask">
                <rect x="0" y="0" width="128" height="128" fill="url(#ping-pong-grad)"></rect>
            </mask>
        </defs>
        <g fill="var(--primary)">
            <g class="ping-pong__ball-x">
                <circle class="ping-pong__ball-y" r="10" fill="#D81A28"></circle>
            </g>
            <g class="ping-pong__paddle-x">
                <rect class="ping-pong__paddle-y" x="-30" y="-2" rx="1" ry="1" width="60" height="4" fill="#D81A28"></rect>
            </g>
        </g>
        <g fill="#D81A28" mask="url(#ping-pong-mask)">
            <g class="ping-pong__ball-x">
                <circle class="ping-pong__ball-y" r="10"></circle>
            </g>
            <g class="ping-pong__paddle-x">
                <rect class="ping-pong__paddle-y" x="-30" y="-2" rx="1" ry="1" width="60" height="4"></rect>
            </g>
        </g>
    </svg>
    
</div>
