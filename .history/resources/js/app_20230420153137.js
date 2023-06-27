require('./bootstrap');


import Alpine from 'alpinejs';
window.Alpine = Alpine
queueMicrotask(() => {
    Alpine.start();
});

// document.addEventListener('alpine:init', () => {
//     Alpine.data('sidebar', () => ({
//         breakpoint : 1000,
//         isAboveBreakpoint: window.innerWidth > breakpoint,
//         open: {
//             above: true,
//             below: false,
//         },
//         handleResize() {
//             this.isAboveBreakpoint = window.innerWidth > breakpoint
//         },
//         isOpen() {
//             console.log(this.isAboveBreakpoint)
//             if (this.isAboveBreakpoint) {
//                 return this.open.above
//             }
//             return this.open.below
//         },
//         handleOpen() {
//             if (this.isAboveBreakpoint) {
//                 this.open.above = true
//             }
//             this.open.below = true
//         },
//         handleClose() {
//             if (this.isAboveBreakpoint) {
//                 this.open.above = false
//             }
//             this.open.below = false
//         },
//         handleAway() {
//             if (!this.isAboveBreakpoint) {
//                 this.open.below = false
//             }
//         },
//     }))
// })