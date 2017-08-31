let jQuery = require('jquery'),
    select2 = require('select2');

window.jQuery = jQuery;
window.$ = window.jQuery;
window.select2 = select2;

$(() => {

    //$.fn.select2.defaults.set("ajax--delay", 50);
    //$.fn.select2.defaults.set("ajax--cache", false);
    //$.fn.select2.defaults.set("ajax--dataType", 'json');
    $.fn.select2.defaults.set("allowClear", true);
    
    let s2Year = $("#s2Year"), s2Show = $("#s2Show"), s2Order = $("#s2Order"), s2OrderBy = $("#s2OrderBy");

    if (s2Year) {
        s2Year.select2({
            placeholder: 'Año',
        });
    }

    if (s2Show) {
        s2Show.select2({
            placeholder: 'Mostrar',
        });
    }

    if (s2Order) {
        s2Order.select2({
            placeholder: 'Dirección',
        });
    }

    if (s2OrderBy) {
        s2OrderBy.select2({
            placeholder: 'Ordenar por',
        });
    }

    let s2Source = $("#s2Source"),
        s2FactoryTypeId = $("#s2FactoryTypeId"),
        s2Type = $("#s2Type"),
        s2Brand = $("#s2Brand"),
        s2Model = $("#s2Model");

    if (s2Source) {
        s2Source.select2({
            placeholder: 'Origen',
        }).on("select2:select", (e) => {
            if (s2Brand) {
                s2Brand.val("").trigger("change").select2({
                    placeholder: 'Marca',
                    ajax: {
                        url: '/automobiles/dropdown/brand?source=' + e.params.data.id,
                    }
                })
            }
            if (s2Type) {
                s2Type.val("").trigger("change").select2({
                    placeholder: 'Tipo',
                    ajax: {
                        url: '/automobiles/dropdown/type?source=' + e.params.data.id,
                    }
                })
            }
            if (s2Model) {
                s2Model.val("").trigger("change").select2({
                    placeholder: 'Modelo',
                    ajax: {
                        url: '/automobiles/dropdown/model?source=' + e.params.data.id,
                    }
                })
            }
        });
    }

    if (s2FactoryTypeId) {
        s2FactoryTypeId.select2({
            placeholder: 'Ident. de tipo de fábrica',
        }).on("select2:select", (e) => {
            if (s2Brand) {
                s2Brand.val("").trigger("change").select2({
                    placeholder: 'Marca',
                    ajax: {
                        url: '/automobiles/dropdown/brand?source=' + (s2Source.val() || '') + '&factory_type_id=' + e.params.data.id,
                    }
                })
            }
            if (s2Type) {
                s2Type.val("").trigger("change").select2({
                    placeholder: 'Tipo',
                    ajax: {
                        url: '/automobiles/dropdown/type?source=' + (s2Brand.val() || '') + '&factory_type_id=' + e.params.data.id,
                    }
                })
            }
            if (s2Model) {
                s2Model.val("").trigger("change").select2({
                    placeholder: 'Modelo',
                    ajax: {
                        url: '/automobiles/dropdown/model?source=' + (s2Brand.val() || '') + '&factory_type_id=' + e.params.data.id,
                    }
                })
            }
        });
    }

    if (s2Brand) {
        s2Brand.select2({
            placeholder: 'Marca',
            ajax: {
                url: '/automobiles/dropdown/brand?source=' + (s2FactoryTypeId.val() || '') + '&factory_type_id=' + (s2FactoryTypeId.val()  || ''),
                data: (params) => {
                    return {
                        term: params.term || '',
                        page: params.page || 1
                    }
                },
            }
        }).on("select2:select", (e) => {
            if (s2Type) {
                s2Type.val("").trigger("change").select2({
                    placeholder: 'Tipo',
                    ajax: {
                        url: '/automobiles/dropdown/type?source=' + (s2FactoryTypeId.val() || '') + '&factory_type_id=' + (s2FactoryTypeId.val()  || '') + '&brand=' + e.params.data.id,
                    }
                })
            }
            if (s2Model) {
                s2Model.val("").trigger("change").select2({
                    placeholder: 'Modelo',
                    ajax: {
                        url: '/automobiles/dropdown/model?source=' + (s2FactoryTypeId.val() || '') + '&factory_type_id=' + (s2FactoryTypeId.val()  || '') + '&brand=' + e.params.data.id,
                    }
                })
            }
        });
    }

    if (s2Type) {
        s2Type.select2({
            placeholder: 'Tipo',
            ajax: {
                url: '/automobiles/dropdown/type?source=' + (s2FactoryTypeId.val() || '') + '&factory_type_id=' + (s2FactoryTypeId.val()  || '') + '&brand= ' + (s2Brand.val() || ''),
                data: (params) => {
                    return {
                        term: params.term || '',
                        page: params.page || 1
                    }
                },
            }
        }).on("select2:select", (e) => {
            if (s2Model) {
                s2Model.val("").trigger("change").select2({
                    placeholder: 'Modelo',
                    ajax: {
                        url: '/automobiles/dropdown/model?source=' + (s2FactoryTypeId.val() || '') + '&brand=' + (s2Brand.val() || '') + '&type=' + e.params.data.id,
                    }
                })
            }
        });
    }

    if (s2Model) {
        s2Model.select2({
            placeholder: 'Modelo',
            ajax: {
                url: '/automobiles/dropdown/model?source=' + (s2FactoryTypeId.val() || '') + '&factory_type_id=' + (s2FactoryTypeId.val()  || '') + '&brand= ' + (s2Brand.val() || '') + '&type=' + (s2Type.val() || ''),
                data: (params) => {
                    return {
                        term: params.term || '',
                        page: params.page || 1
                    }
                },
            }
        });
    }
});
