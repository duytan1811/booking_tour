import $ from "jquery";
window.$ = window.jQuery = $;

import select2 from "select2";
import moment from "moment";
import popper from "popper.js";
import "./bootstrap";
import "../theme/admin/js/codebase.app.min.js";
import SimpleMDE from 'simplemde';
import 'simplemde/dist/simplemde.min.css';

document.addEventListener('DOMContentLoaded', function () {
    const textarea = document.querySelector('#editor');
    if (textarea) {
        new SimpleMDE({
            element: textarea,
            spellChecker: false,
            status: false
        });
    } else {
        console.error('SimpleMDE: Không tìm thấy phần tử #editor');
    }
});
window.Popper = popper;
window.moment = moment;

window.select2 = select2;
