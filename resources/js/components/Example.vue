<template>
    <div class="container">
        <span>{{ count }} watching now</span>
        <div class="widget">
            <div id="accordion">
                <span class="glyphicon glyphicon-comment"></span> Comments
            </div>
            <div class="input-group">
                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." v-model="body" @keyup.enter="postComment()" autofocus />
                <br><button class="btn btn-success" id="btn-chat" @click.prevent="postComment()">Send</button>
            </div>
            <ul class="list-group">
                <li class="list-group-item" v-for="(comment, id) in comments" :key="id">
                    <div class="col-xs-10 col-md-11">
                        <div class="comment-text">
                            {{ comment.body }}
                        </div>
                        <div class="mic-info">
                            By: <a href="#">{{ comment.user.name }}</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user', 'video'],
        data() {
            return {
                viewers: [],
                comments: [],
                body: '',
                count: 0
            }
        },
        mounted() {
            this.listen();
            this.getComments();
        },
        methods: {
            getComments() {
                axios.get('/api/videos/'+ this.video.id +'/comments?api_token=' + this.user.api_token, {})
                .then((response) => {
                    this.comments = response.data;
                });
            },
            postComment() {
                axios.post('/api/videos/'+ this.video.id +'/comment?api_token=' + this.user.api_token, {
                    body: this.body,
                    userid: this.user.id,
                    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                })
                .then((response) => {
                    this.body= '';
                    this.comments.unshift(response.data);
                });
            },
            listen() {
                Echo.join('video')
                    .here((users) => {
                        this.count = users.length;
                    })
                    .joining((user) => {
                        this.count++;
                    })
                    .leaving((user) => {
                        this.count--;
                    })
                    .listen('NewCommentEvent', (e) => {
                        this.comments.unshift(e);
                    });
            }
        }
    }
</script>
