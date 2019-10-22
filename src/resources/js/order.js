// window.Vue = require('vue');
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//alert('Test!');


let data = {
    count: 1,
    price: 0,

    product: {
        approximate_price: 0,
        salling_price: 0,
        warehouse_total_quantity: 0
    }
};

const productFieldName = 'product[product_id]';
const approximatePriceFieldName = 'product[approximate_price]';
const sellingPriceFieldName = 'product[selling_price]';
const warehouseTotalQuantityFieldName = 'product[warehouse_total_quantity]';

const amountFieldName = 'product[amount]';
const countFieldName = 'product[count]';
const priceFieldName = 'product[item_price]';

bindToField(approximatePriceFieldName, 'product.approximate_price', data);
bindToField(sellingPriceFieldName, 'product.salling_price', data);
bindToField(warehouseTotalQuantityFieldName, 'product.warehouse_total_quantity', data);

bindToField(amountFieldName, 'amount', data);
bindToField(countFieldName, 'count', data);
bindToField(priceFieldName, 'price', data);

$(function () {
    $(getFieldByName(productFieldName)).on('select2:select', function (event) {
        var selectedData = event.params.data;

        data.product.approximate_price = selectedData.approximate_price;
        data.product.salling_price = selectedData.selling_price;
        data.price = selectedData.selling_price;
        data.product.warehouse_total_quantity = selectedData.warehouse_total_quantity;
    });
});

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

    function createFieldTemplate(field, dataKey) {
        field.setAttribute('v-model', dataKey);

        return field.outerHTML;
    }
}

function getFieldByName(fieldName) {
    return document.getElementsByName(fieldName)[0];
}
