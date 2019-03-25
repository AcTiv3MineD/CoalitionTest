<template lang="pug">
b-container
    b-row( style="margin-bottom: 10px")
        b-col
            b-button( @click="goToCreate" ) Create Product
    
    b-row
        b-col
            b-table( hover :items="products" :fields="fields" )
</template>
<script>
export default {
    created() {
        this.$http.post( 'products/filter' )
            .then((response) => {
                if (response.data._META.status !== 'ok') return
                this.products = response.data._DATA.products

                const stock_summary = this.products.reduce((accumulator, product) => {
                    return parseInt(product.stock) + accumulator
                },0)

                const price_summary = this.products.reduce((accumulator, product) => {
                    return parseFloat(product.price) + accumulator
                },0)

                const total_summary = this.products.reduce((accumulator, product) => {
                    return parseFloat(product.total) + accumulator
                },0)

                this.products.push( {
                    name: 'Summary',
                    stock: stock_summary,
                    price: price_summary,
                    total: total_summary,
                    datetime: '-',
                })
            })
    },
    data() {
        return {
            fields: [
                {
                    key: 'name',
                },
                {
                    key: 'stock',
                    label: 'Quantity in stock',
                },
                {
                    key: 'price',
                    label: 'Price per item'
                },
                {
                    key: 'datetime',
                    label: 'Date Time'
                },
                {
                    key: 'total'
                },
            ],
            products: [],
        }
    },
    methods: {
        goToCreate() {
            this.$router.push({name:'create_product'})
        }
    }
}
</script>

