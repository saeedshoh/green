window._ = require('lodash');
require('alpinejs');

// Theme
// import './theme/autosize';
import './theme/bootstrap';
import './theme/chart';
// import './theme/checklist';
import './theme/choices';
// import './theme/dropzone';
// import './theme/flatpickr';
// import './theme/highlight';
// import './theme/inputmask';
// import './theme/kanban';
import './theme/list';
// import './theme/map';
import './theme/navbar-collapse';
import './theme/navbar-dropdown';
import './theme/popover';
// import './theme/quill';
import './theme/tooltip';
// import './theme/wizard';

// User
// import './theme/user';

let toast = [].slice.call(document.querySelectorAll('.toast')).map((el) => {
    return new Toast(el);
})
toast.forEach(toast => toast.show());

let inputPasswordSwitch = document.getElementById('inputPasswordSwitch')
    inputPasswordSwitch?.addEventListener('change', () => {
        document.getElementById('passwordInput').toggleAttribute('disabled');
        document.querySelector('.js-show-password').classList.toggle('disabled');
    });


let showPasswordInput = document.querySelector('.js-show-password');
    showPasswordInput?.addEventListener('click', function() {
        let passwordInput = document.getElementById('passwordInput');

        if(passwordInput.getAttribute('type') === 'password') {
            passwordInput.setAttribute('type', 'text');

            showPasswordInput.getElementsByTagName('i')[0].style.color = '#2C7BE5';
        } else {
            passwordInput.setAttribute('type', 'password');

            showPasswordInput.getElementsByTagName('i')[0].removeAttribute('style');
        }
    });

let form = document.querySelector('.needs-validation');
    form?.addEventListener('submit', () => {
        let btn = form.querySelector('[type="submit"]');
            btn.innerText = "В процессе...";
            btn.disabled = 'disabled';
    });

let formFilter = document.getElementById('js-filter');
    formFilter?.addEventListener('submit', () => {
        let input = formFilter.querySelectorAll('input');

        Array.from(input).filter(element => {
             if(element.value.length === 0) {
                 element.setAttribute('disabled', true);
             }
        });
    });

