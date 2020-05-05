<template>
    <div>
        <h1 ref="myref">Hooks data</h1>

        <p>My name is: {{ name }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: "ripon"
        };
    },

    beforeCreate(){
        // user loggedin or not check 
        // limited use this method
        // created method work then work this method 
        // when we developed authentication we  used this method
        console.log(this.name);

    },
    created() {
        // call mostly initial data from it
        console.log('data and other function is available but not html', this.name);
    },
    mounted(){
        // this method  is very useful 
        //whene we developed e-commerce website buildup then use this method
        console.log(this.$refs.myref);
    }
};
</script>
