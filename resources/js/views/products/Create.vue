<template lang="pug">
b-form( @submit="onSubmit" )
    b-form-group(
        label="Name"
    )
        b-form-input(
            v-model="form.name"
            required
            placeholder="Enter product name"
        )
    
    b-form-group(
        label="Quantity in stock"
    )
        b-form-input(
            type="number"
            v-model="form.stock"
            required
            placeholder="Enter quantity in stock"
        )
    
    
    b-form-group(
        label="Price per item"
    )
        b-form-input(
            v-model="form.price"
            required
            placeholder="Enter price per item"
        )
    b-button( type="submit" variant="primary" ) Submit 
</template>
<script>
export default {
    data() {
        return {
            form: {
                name: '',
                price: '',
                stock: '',
            },
        }
    },
    methods: {
        onSubmit(evt) {
            evt.preventDefault()
            
            this.$http.post('products', this.form)
            .then((response)=> {
                if (response.data._META.status !== 'ok') return

                this.$router.push({name: 'list_products'})
            })
        },
    },
}
</script>
