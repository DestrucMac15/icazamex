<template>
    <div class="component">
        <div class="card">
            <div class="card-header text-right">
                <slot name="toolbar"></slot>
            </div>
            <div class="card-body">

            </div>
            <div class="table-responsive">
                <vuetable ref="vuetable"
                    :api-url="api"
                    :fields="fields"
                    pagination-path="meta"
                    :css="css.table"
                    :sort-order="sortOrder"
                    :multi-sort="true"
                    :append-params="moreParams"
                    @vuetable:pagination-data="OnPaginationData"
                    @vuetable:row-clicked="OnRowClicked" >

                    <template slot="right-chevron">
                        <div class="template">
                            <i class="bi bi-chevron-compact-right"></i>
                        </div>
                    </template>
                </vuetable>
                <div class="vuetable-pagination px-2 py-2">
                    <vuetable-pagination-info ref="paginationInfo"
                        info-class="pagination-info"
                    ></vuetable-pagination-info>
                    <vuetable-pagination ref="pagination"
                        :css="css.pagination"
                        @vuetable-pagination:change-page="OnChangePage"
                    ></vuetable-pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vuetable from 'vuetable-2'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
import CssForBootstrap4 from '../../VuetableCssBootstrap4'
export default {
    props:{
        tipo: {
            type: String,
            value: 'propiedades'
        }
    },
    mounted(){

    },
    components: {
        Vuetable,
        VuetablePagination,
        VuetablePaginationInfo,
    },
    computed: {
        api(){
            return `blog/table/data?search=${this.keywords}`
        }
    },
    data(){
        return {
            keywords: '',
            fields: [
                {
                    name: 'id',
                    sortField: 'id',
                    title: '#'
                },
                {
                    name: 'titulo',
                    sortField: 'titulo',
                    title: 'Título'
                },
                {
                    name: 'created_at',
                    sortField: 'created_at',
                    title: 'Fecha de creación'
                },
                {
                    name: '__slot:right-chevron',
                    title: '',
                    dataClass: 'text-right aligned',
                },
                /* { name: '__slot:actions', title: '', titleClass: 'text-right aligned', dataClass: 'text-center aligned' }*/
            ],
            css: CssForBootstrap4,
            sortOrder: [
                { field: 'id', sortField: 'id', direction: 'desc'}
            ],
            moreParams: {},
        }
    },
    methods: {
        OnRowClicked(record, evt){
            window.location.href = `blog/${record.id}/edit`
        },
        OnPaginationData(paginationData){
            this.$refs.pagination.setPaginationData(paginationData)
            this.$refs.paginationInfo.setPaginationData(paginationData)
        },
        OnChangePage (page) {
            this.$refs.vuetable.changePage(page)
        }
    }
}
</script>

<style scoped>
    tr{
        cursor: pointer;
    }
</style>
