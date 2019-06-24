<template>
<div>
    <form @submit="createPost">
        <div class="row">
            <div class="col-8 offset-2">
            <h1>Add New Post</h1>
                <div class="form-group row">
                    <label for="title">Post Title</label>
                    <input id="title" type="text" v-model="form.title" class="form-control" autocomplete="title" autofocus>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="content">Content</label>
                    <textarea class="form-control" v-model="form.content" id="content" rows="3" autocomplete="content" autofocus></textarea>
                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <button class="btn btn-primary">Add New Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data: function() {
            return {
                form: {
                    title: '',
                    content: ''
                }
            }
        },
        
        methods: {
            createPost() {
                axios.post('/p', this.form)
                .then(resp => {
                    if (resp.status == 200) {
                        window.location = '/';
                    }
                    console.log(resp);
                })
                .catch(err => {
                    console.log(err)
                })
            }
        }
    }
</script>
