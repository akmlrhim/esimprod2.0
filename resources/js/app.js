import "./bootstrap";
import "flowbite";
import AOS from "aos";
import Quill from "quill";
import "quill/dist/quill.snow.css"; // Add Quill CSS for proper styling

window.Quill = Quill;
import $ from "jquery";
window.$ = window.jQuery = $;
AOS.init();

// document.addEventListener("DOMContentLoaded", function () {
//     const editor = document.querySelector("#editor"); // Your Quill editor container ID
//     if (editor) {
//         const quill = new Quill(editor, {
//             theme: "snow", // You can use 'bubble' or other themes
//             modules: {
//                 toolbar: [
//                     [{ header: "1" }, { header: "2" }, { font: [] }],
//                     [{ list: "ordered" }, { list: "bullet" }],
//                     ["bold", "italic", "underline"],
//                     ["link"],
//                     ["blockquote"],
//                     [{ align: [] }],
//                     ["clean"],
//                 ],
//             },
//         });
//         window.quill = Quill;
//     }
// });
