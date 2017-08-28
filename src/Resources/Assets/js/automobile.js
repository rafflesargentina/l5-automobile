let jQuery = require('jquery'),
    select2 = require('select2');

window.jQuery = jQuery;
window.$ = window.jQuery;
window.select2 = select2;

$(() => {
    let s2Source = $("#s2Source"),
        s2Type = $("#s2Type"),
        s2Brand = $("#s2Brand"),
        s2Model = $("#s2Model");

    if (s2Source) {
        s2Source.select2({
            placeholder: 'Seleccioná un origen',
        }).on("select2:select", (e) => {
            if (s2Brand) {
                s2Brand.val("").trigger("change").select2({
                    placeholder: 'Seleccioná una marca',
                    ajax: {
                        url: '/automobiles/dropdown/brand?source=' + e.params.data.id,
                    }
                })
            }
            if (s2Type) {
                s2Type.val("").trigger("change").select2({
                    placeholder: 'Seleccioná un tipo',
                    ajax: {
                        url: '/automobiles/dropdown/type?source=' + e.params.data.id,
                    }
                })
            }
            if (s2Model) {
                s2Model.val("").trigger("change").select2({
                    placeholder: 'Seleccioná un modelo',
                    ajax: {
                        url: '/automobiles/dropdown/model?source=' + e.params.data.id,
                    }
                })
            }
        });
    }

    if (s2Brand) {
        s2Brand.select2({
            placeholder: 'Seleccioná una marca',
            ajax: {
                url: '/automobiles/dropdown/brand?source=' + s2Source.val() || '',
                data: (params) => {
                    return {
                        term: params.term || '',
                        page: params.page || 1
                    }
                },
                cache: true,
                delay: 50,
                dataType: 'json',
            }
        }).on("select2:select", (e) => {
            if (s2Type) {
                s2Type.val("").trigger("change").select2({
                    placeholder: 'Seleccioná un tipo',
                    ajax: {
                        url: '/automobiles/dropdown/type?source=' + (s2Source.val() || '') + '&brand=' + e.params.data.id,
                    }
                })
            }
            if (s2Model) {
                s2Model.val("").trigger("change").select2({
                    placeholder: 'Seleccioná un modelo',
                    ajax: {
                        url: '/automobiles/dropdown/model?source=' + (s2Source.val() || '') + '&brand=' + e.params.data.id,
                    }
                })
            }
        });
    }

    if (s2Type) {
        s2Type.select2({
            placeholder: 'Seleccioná un tipo',
            ajax: {
                url: '/automobiles/dropdown/type?source=' + (s2Source.val() || '') + '&brand= ' + s2Brand.val(),
                data: (params) => {
                    return {
                        term: params.term || '',
                        page: params.page || 1
                    }
                },
                cache: true,
                delay: 50,
                dataType: 'json',
            }
        }).on("select2:select", (e) => {
            if (s2Model) {
                s2Model.val("").trigger("change").select2({
                    placeholder: 'Seleccioná un modelo',
                    ajax: {
                        url: '/automobiles/dropdown/model?source=' + (s2Source.val() || '') + '&brand=' + (s2Brand.val() || '') + '&type=' + e.params.data.id,
                    }
                })
            }
        });
    }

    if (s2Model) {
        s2Model.select2({
            placeholder: 'Seleccioná un modelo',
            ajax: {
                url: '/automobiles/dropdown/model?source=' + (s2Source.val() || '') + '&brand= ' + (s2Brand.val() || '') + '&type=' + (s2Type.val() || ''),
                data: (params) => {
                    return {
                        term: params.term || '',
                        page: params.page || 1
                    }
                },
                cache: true,
                delay: 50,
                dataType: 'json',
            }
        });
    }
});
