<template>
    <div>
        <!-- <h2> The number is: {{counter}} </h2> -->
        <h2>The number is: {{ views }}</h2>
        <button @click="updateCounter(1)">Increase</button>
        <button @click="updateCounter(-1)">Decrease</button>
     <br>
     <br><br>
     <div v-for="(blog,i) in blogs"  :key="i" v-if="blogs.length">
         <h1> {{blog.title}} </h1>
         <p> {{blog.post}} </p>
     </div>
        <br>
        <br>

        <div>
            <h1 v-if="showitem"> show item if "showitem" is true </h1>
            <p v-else> show item if "showitem" is false </p>
        </div>
        <button @click="showitem = !showitem"> Change showitem</button>
     
    
    </div>
</template>

<script>
export default {
    data() {
        return {
            // counter:0
            views: 0,

            blogs: [],
            showitem:false,
        };
    },

    methods: {
        updateCounter(number) {
            // this.counter +=number
            this.views += number;
        },
        changeShowItem(){
            this.showitem = !this.showitem
        }

    },

    created() {
        // call the server to get views of this blog post
        this.views = 100;

        // get the blog post
        let posts = [{ title: 'this is blog title 1', 'post': 'this is the blog post 1', id: 1},
                    { title: 'this is blog title 2', 'post': 'this is the blog post 2',id: 2},
                    { title: 'this is blog title 3', 'post': 'this is the blog post 3',id: 3},
                    { title: 'this is blog title 4', 'post': 'this is the blog post 4',id: 4},]
    
      this.blogs = posts
    
    }
};
</script>
