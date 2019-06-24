<template>
<div>
    <form @submit="createComment">
        <div class="row">
            <div class="col-9">
                <div class="col-8 offset-2">
                    <form @submit="createComment">
                        <div class="form-group row">
                            <label for="content">Comment</label>
                            <textarea class="form-control" v-model="form.comment" rows="3" autocomplete="comment" autofocus></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </form>

    <div class="row bg-white p-2 pt-4 mt-5" v-for="(comment, index) in result.slice().reverse()" :key="index">
        <div class="col-9">
            <strong>User ID : {{ comment.user_id }}</strong>
            <p class="mt-3">
                {{ comment.comment }}
            </p>
            <p class="mt-3">
                {{ comment.created_at }}
            </p>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: ['post'],

        mounted() {
            axios.get(`/comment/${this.postId}`)
            .then(resp => {
                this.result = resp.data
                console.log(resp)
            })
            console.log('Component Mounted !');
        },

        data: function() {
            return {
                renderComponent: true,
                postId: this.post,
                form: {
                    comment: ''
                },
                result: []
            }
        },
        
        methods: {
            forceRerender() {
                this.$forceUpdate();
            },

            createComment(e) {
                axios.post(`/comment/${this.postId}`, this.form)
                .then(resp => {
                    this.form.comment = '';
                    this.result = resp.data
                    console.log(resp)
                })
                .catch(err => {
                    console.log(err)
                })
                this.forceRerender();
                e.preventDefault()
            }
        }
    }
</script>
