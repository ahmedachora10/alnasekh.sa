import './bootstrap';

import Alpine from 'alpinejs';



import Cleave from 'cleave.js';
import '../../node_modules/cleave.js/dist/addons/cleave-phone.sa.js';

window.Alpine = Alpine;

Alpine.start();

const phoneNumber = $('.phone-number');

console.log('Hi word test');

if (phoneNumber.length) {
    $cleave = new Cleave(document.querySelector('.phone-number'), {
        phone: true,
        phoneRegionCode: 'SA'
    });
}


