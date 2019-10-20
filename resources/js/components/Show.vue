<template>
    <div>
        <div v-show="!loading">
            <div
                class="big-pic"
                data-aos="fade-right"
                :style="{ backgroundImage: `url(${post.post.featured_image})` }"
            >
                <section class="hero is-large big-pic">
                    <div class="hero-body">
                        <div class="container">
                            <h1
                                class="title has-text-white is-1 is-size-2-mobile"
                            >{{ post.post.title }}</h1>
                        </div>
                    </div>
                </section>
            </div>
            <section class="section">
                <div class="container">
                    <div class="columns">
                        <div class="column is-6 is-offset-one-quarter">
                            <div class="artical-hearder" data-aos="fade-up" data-aos-once="true">
                                <h1
                                    class="center has-text-black is-1 is-size-1 is-size-3-mobile has-text-black"
                                >{{ post.post.title }}</h1>
                                <div class="center desktop">
                                    <figure class="image is-64x64" style="margin-right:40px;">
                                        <img class="is-rounded" src alt="ops" />
                                    </figure>
                                    <span class="subtitle is-3" style="padding-top:20px;"></span>
                                    <div class="is-divider-vertical"></div>
                                    <span>Published at : {{ post.post.updated_at }}</span>
                                </div>
                                <div class="mobile">
                                    <div class="center" style="padding-top:20px;">
                                        <figure class="image is-64x64">
                                            <img class="is-rounded" src alt="ops" />
                                        </figure>
                                    </div>
                                    <div class="center" style="padding-top:20px;">
                                        <span class="subtitle is-4"></span>
                                    </div>
                                    <div class="center" style="padding-top:20px;">
                                        <div>Published at : {{ post.post.published_at }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="is-divider"></div>
                            <div data-aos="fade-up" data-aos-once="true">
                                <div class="artical-body" v-html="post.post.body"></div>
                                <div class="tags are-large">
                                    <a
                                        :href="`/posts/${tag.slug}`"
                                        v-for="tag in post.tags"
                                        :key="tag.id"
                                    >
                                        <span class="tag is-dark">{{ tag.name }}</span>&nbsp;&nbsp;
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section" data-aos="fade-up" data-aos-once="true">
                <div class="container">
                    <div class="is-divider"></div>
                    <h1 class="title center has-text-black">More Posts</h1>
                    <div class="columns">
                        <div
                            class="column is-one-third center"
                            v-for="relate in post.relates"
                            :key="relate.id"
                        >
                            <div class="card artical">
                                <div class="card-image">
                                    <figure class="image is-5by4">
                                        <a :href="`/show/${relate.post.slug}`">
                                            <img
                                                :src="relate.post.featured_image"
                                                alt="Placeholder image"
                                            />
                                        </a>
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="media">
                                        <div class="media-content">
                                            <p class="title is-5">
                                                <a
                                                    :href="`/show/${relate.post.slug}`"
                                                >{{ relate.post.title }}</a>
                                            </p>
                                            <div class="tags are-small">
                                                <a
                                                    :href="`/posts/${tag.slug}`"
                                                    v-for="tag in relate.post.tags"
                                                    :key="tag.id"
                                                >
                                                    <span class="tag is-dark">{{ tag.name }}</span>&nbsp;
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            post: "",
            loading: false,
            good: true
        };
    },
    mounted() {
        let that = this;
        that.loading = true;
        axios
            .get(`/api${location.pathname}`)
            .then(function(response) {
                that.post = response.data;
                that.loading = false;
            })
            .catch(error => console.log(error));
    }
};
</script>
<style scoped>
.big-pic {
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    filter: blur(0.8px);
}
</style>
