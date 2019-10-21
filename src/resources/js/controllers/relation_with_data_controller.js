import { Controller } from 'stimulus';

export default class extends Controller {
    static get targets() {
        return ['select'];
    }

    connect() {
        if (document.documentElement.hasAttribute('data-turbolinks-preview')) {
            return;
        }

        const select = this.selectTarget;
        const model = this.data.get('model');
        const name = this.data.get('name');
        const key = this.data.get('key');
        const scope = this.data.get('scope');
        const dataFieldNames = this.data.get('dataFieldNames');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
            },
        });

        $(select).select2({
            theme: 'bootstrap',
            allowClear: !select.hasAttribute('required'),
            ajax: {
                type: 'POST',
                cache: true,
                delay: 250,
                url: () => this.data.get('route'),
                dataType: 'json',
                processResults: (data) => {
                    debugger;
                    console.log("Data:");
                    console.log(data);
                    let selectValues = $(select).val();
                    selectValues = Array.isArray(selectValues) ? selectValues : [selectValues];

                    console.log("Select value:");
                    console.log(selectValues);
                    debugger;

                    const ret = {
                        results: Object.keys(data).reduce((res, id) => {
                            if (selectValues.includes(id.toString())) {
                                return res;
                            }

                            return [...res, {
                                id,
                                text: data[id],
                            }];
                        }, []),
                    };

                    console.log("Ret:");
                    console.log(ret);

                    debugger;
                    return ret;
                },
                data: params => ({
                    search: params.term,
                    model,
                    name,
                    key,
                    scope,
                    dataFieldNames,
                }),
            },
            placeholder: select.getAttribute('placeholder') || '',
        });

        if (!this.data.get('value')) {
            return;
        }

        const values = JSON.parse(this.data.get('value'));

        values.forEach((value) => {
            $(select)
                .append(new Option(value.text, value.id, true, true))
                .trigger('change');
        });

        document.addEventListener('turbolinks:before-cache', () => {
            $(select).select2('destroy');
        }, { once: true });
    }
}