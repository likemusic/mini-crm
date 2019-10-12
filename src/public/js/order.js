// window.Vue = require('vue');
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//alert('Test!');


let data = {
    count: 5,
    price: 10,
};

const amountFieldName = 'product[amount]';
const countFieldName = 'product[count]';
const priceFieldName = 'product[item_price]';

bindToField(amountFieldName, 'amount', data);
bindToField(countFieldName, 'count', data);
bindToField(priceFieldName, 'price', data);

function bindToField(fieldName, dataKey, data) {
    let field = getFieldByName(fieldName);
    let fieldTemplate = createFieldTemplate(field, dataKey);

    bindVue(data, field, fieldTemplate);

    function bindVue(data, field, template) {
        new Vue({
            data: data,
            el: field,
            template: template,
            computed: {
                amount: function () {
                    return (this.$data.count * this.$data.price).toFixed(2);
                }
            }
        });
    }

    function getFieldByName(fieldName) {
        return document.getElementsByName(fieldName)[0];
    }

    function createFieldTemplate(field, datKey) {
        field.setAttribute('v-model', dataKey);

        return field.outerHTML;
    }
}

//
// const Test = {
//     // data: data,
//     template: amountTemplate,
//     props: ['count', 'price'],
//     computed: {
//         amount: function () {
//             return this.$data.count * this.$data.price;
//         },
//     }
// };
//
// const TestCtor = Vue.extend(Test);
// const vm = new TestCtor({
//     // propsData: data,
//     data: data
// }).$mount(amountField);
//
// const app = new Vue({
//     el: '#app',
// });
