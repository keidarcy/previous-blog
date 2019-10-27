<template>
    <div>
        <v-app>
            <div>
                <v-alert
                    v-model="alert"
                    dismissible
                    color="cyan"
                    border="left"
                    elevation="2"
                    colored-border
                    icon="mdi-auto-fix"
                >{{ randomSentence }}</v-alert>
            </div>
            <section class="section">
                <div class="container">
                    <div
                        class="mobile-changing-words changing-words has-text-weight-bold center tooltip is-tooltip-bottom is-family-code"
                        data-tooltip="TRY TO TYPE SOME WORDS!"
                        style="padding-top:100px;"
                    ></div>
                </div>
            </section>
            <section class="section">
                <div class="container">
                    <div class="columns">
                        <div class="column is-half is-offset-one-quarter">
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input
                                        class="input my-input is-primary is-rounded is-medium desktop"
                                        type="text"
                                        placeholder="TYPE SOME MAGIC TO ME"
                                    />
                                    <input
                                        class="input my-input is-primary is-rounded is-medium mobile"
                                        type="text"
                                        placeholder="TYPE SOME MAGIC TO ME"
                                    />
                                    <span class="icon is-large is-left">
                                        <i class="fas fa-theater-masks"></i>
                                    </span>
                                    <div class="buttons center" style="padding-top:80px;">
                                        <a
                                            class="my-button-2 button add-words is-uppercase"
                                            type="submit"
                                        >add phrases</a>
                                        <a href="/posts" class="my-button button">EXPLORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </v-app>
    </div>
</template>
<script>
export default {
    data() {
        return {
            alert: true,
            sentences: [
                "Hey, what bring you to here ?",
                "Hey, how's your day today?",
                "What part do you make progress today ?",
                "Did you work out today ?",
                "What's the weather there ?",
                "Hi, my name is xyh. What's your name ?"
            ]
        };
    },
    computed: {
        randomSentence() {
            return this.sentences[
                Math.floor(Math.random() * this.sentences.length)
            ];
        }
    }
};
</script>

