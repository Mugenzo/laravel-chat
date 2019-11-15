<template>
    <div>
        <div class="card mt-2" v-for="message in messages">
            <div class="card-header"><i>{{message.user.name}}</i><span class="float-right">{{message.created_at | formatDate}}</span>
            </div>
            <div class="card-body" v-html="message.message"></div>
        </div>
        <form class="mt-3">
            <label style="width: 100%">
                <vue-editor v-model="message"/>
            </label>
            <button class="btn btn-info" @click.prevent="sendMessage">Отправить</button>
        </form>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        name: "Chat",
        props: ['user', 'channel', 'mes'],
        data() {
            return {
                editor: ClassicEditor,
                editorConfig: {
                    minHeight: '300px'
                },
                messages: [],
                message: ''
            }
        },
        created() {
            this.messages = JSON.parse(this.mes);
            Echo.private(`channel.${this.channel}`)
                .listen('MessageEvent', (e) => {
                    console.log(e.message);
                    this.messages.push(e.message)
                })
        },
        methods: {
            sendMessage() {
                fetch(`/send?m=${this.message}&c=${this.channel}`)
                    .then(() => {
                        this.message = '';
                    })
            }
        }
    }
</script>

<style scoped>

</style>
