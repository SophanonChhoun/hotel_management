// window.Vue = require('vue');
// window._ = require('lodash');
//
// import VeeValidate from 'vee-validate';
// Vue.use(VeeValidate);
//
// Vue.directive('select2', {
//     inserted(el) {
//         $(el).on('select2:select', () => {
//             const event = new Event('change', {bubbles: true, cancelable: true});
//             el.dispatchEvent(event);
//         });
//     },
// });


window.Vue = require('vue');
window._ = require('lodash');

import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);

import InputTag from 'vue-input-tag';

Vue.component('input-tag', InputTag);

Vue.directive('select2', {
    inserted(el) {
        $(el).on('select2:select', () => {
            const event = new Event('change', {bubbles: true, cancelable: true});
            el.dispatchEvent(event);
        });
    }
});

Vue.mixin({
    methods: {
        checkLanguageTab(fields, error = null) {
            let status = true;

            status = fields.every((field) => {
                if(this.errors.first(field + '_en') || (error && error[field + '_en'])) {
                    $("#english").addClass("active");
                    $("#englishTab").addClass("active in");
                    $("#khmer").removeClass("active");
                    $("#khmerTab").removeClass("active in");
                    $("#china").removeClass("active");
                    $("#chinaTab").removeClass("active in");
                    $("#japan").removeClass("active in");
                    $("#japanTab").removeClass("active in");

                    return false;
                }

                return true
            });

            if(!status) return false;

            status = fields.every((field) => {
                if(this.errors.first(field + '_km') || (error && error[field + '_km'])) {
                    $("#khmer").addClass("active");
                    $("#khmerTab").addClass("active in");
                    $("#english").removeClass("active");
                    $("#englishTab").removeClass("active in");
                    $("#china").removeClass("active");
                    $("#chinaTab").removeClass("active in");
                    $("#japan").removeClass("active in");
                    $("#japanTab").removeClass("active in");

                    return false;
                }

                return true
            });

            if(!status) return false;

            status = fields.every((field) => {
                if(this.errors.first(field + '_zh') || (error && error[field + '_zh'])) {
                    $("#china").addClass("active");
                    $("#chinaTab").addClass("active in");
                    $("#khmer").removeClass("active");
                    $("#khmerTab").removeClass("active in");
                    $("#english").removeClass("active");
                    $("#englishTab").removeClass("active in");
                    $("#japan").removeClass("active in");
                    $("#japanTab").removeClass("active in");

                    return false;
                }

                return true
            });



            if(!status) return false;

            status = fields.every((field) => {
                if(this.errors.first(field + '_ja') || (error && error[field + '_ja'])) {
                    $("#china").removeClass("active");
                    $("#chinaTab").removeClass("active in");
                    $("#khmer").removeClass("active");
                    $("#khmerTab").removeClass("active in");
                    $("#english").removeClass("active");
                    $("#englishTab").removeClass("active in");
                    $("#japan").addClass("active in");
                    $("#japanTab").addClass("active in");

                    return false;
                }

                return true
            });

            return status;
        },

        isCKEditorLanguageError(data, error, fields, labels = []) {
            let is_error = false;


            fields.every((field) => {
                const label = labels[field] ? labels[field] :_.startCase(_.toLower(field.replace('_', ' ')));

                if (!data[field + '_en']) {
                    error[field + '_en'] = 'The ' + label + ' in English field is required.';
                    is_error = true;
                    data[field + '_en'] = ' ';
                    data[field + '_en'] = '';
                } else {
                    error[field + '_en'] = '';
                }

                if (!data[field + '_km']) {
                    error[field + '_km'] = 'The ' + label + ' in Khmer field is required.';
                    is_error = true;
                    data[field + '_km'] = ' ';
                    data[field + '_km'] = '';
                } else {
                    error[field + '_km'] = '';
                }

                if (!data[field + '_zh']) {
                    error[field + '_zh'] = 'The ' + label + ' in China field is required.';
                    is_error = true;
                    data[field + '_zh'] = ' ';
                    data[field + '_zh'] = '';
                } else {
                    error[field + '_zh'] = '';
                }

                if (!data[field + '_ja']) {
                    error[field + '_ja'] = 'The ' + label + ' in Japan field is required.';
                    is_error = true;
                    data[field + '_ja'] = ' ';
                    data[field + '_ja'] = '';
                } else {
                    error[field + '_ja'] = '';
                }

                return true;
            });

            return is_error;
        }
    }
})

Vue.use(require('vue-moment'));

import Popover  from 'vue-js-popover'
Vue.use(Popover)
