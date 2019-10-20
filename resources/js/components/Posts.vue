<template>
    <div>
        <section class="section">
            <div class="container">
                <div class="control has-icons-left has-icons-right">
                    <input
                        type="text"
                        class="input is-large desktop"
                        placeholder="Search for title ;) "
                        v-model="textSearch"
                        :class="[articalsFilter.length==0 ? 'is-danger' : 'is-success']"
                    />
                    <span class="icon is-large is-left desktop">
                        <i class="fa-2x fab fa-searchengin"></i>
                    </span>
                    <input
                        type="text"
                        class="input is-medium mobile"
                        placeholder="Search for title ;) "
                        v-model="textSearch"
                        :class="[articalsFilter.length==0 ? 'is-danger' : 'is-success']"
                    />
                    <span class="icon is-left mobile">
                        <i class="fab fa-searchengin"></i>
                    </span>
                </div>
            </div>
        </section>

        <div v-if="about==''"></div>
        <div class="title is-4 center" v-else>posts about {{ about }}</div>

        <section class="section">
            <div class="container">
                <div v-if="articalsFilter && articalsFilter.length">
                    <div class="columns is-multiline">
                        <div
                            class="column is-one-third center"
                            v-for="artical in articalsFilter"
                            :key="artical.id"
                        >
                            <div class="notification artical">
                                <div class="card">
                                    <div class="card-image">
                                        <figure class="image is-4by3">
                                            <a :href="`/show/${artical.slug}`">
                                                <img
                                                    :src="artical.featured_image"
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
                                                        :href="`/show/${artical.slug}`"
                                                    >{{ artical.title }}</a>
                                                </p>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="content">
                                            <a :href="`/show/${artical.slug}`">{{ artical.summary }}</a>
                                            <br />
                                        </div>
                                        <div class="tags are-medium">
                                            <span
                                                class="tag is-dark"
                                                v-for="tag in artical.tags"
                                                :key="tag.id"
                                            >
                                                <a :href="`/posts/${tag.slug}`">{{ tag.name }}</a>
                                            </span>
                                        </div>
                                        <time class="right">{{ artical.published_at }}</time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="help is-danger" v-else>Sorry, no result!</div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            articals: [],
            textSearch: "",
            about: location.pathname.slice(7)
        };
    },
    computed: {
        articalsFilter: function() {
            let textSearch = this.textSearch;
            return this.articals.filter(function(el) {
                return el.title
                    .toLowerCase()
                    .includes(textSearch.toLowerCase());
            });
        }
    },
    mounted() {
        let that = this;
        axios
            .get(`/api${location.pathname}`)
            .then(response => (that.articals = response.data))
            .catch(error => console.log(error));
    }
};
</script>
