<div class="big-pic" data-aos="fade-right">
    <section class="hero is-large big-pic">
        <div class=" hero-body">
            <div class="container">
                <h1 class="title has-text-white is-1 is-size-2-mobile">
                    {{ $post['post']['title'] }}
                </h1>
            </div>
        </div>
    </section>
</div>

<style>
    .big-pic {
        background-image: url("{{ $post['post']['featured_image'] }}");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        filter: blur(0.8px);
    }
</style>
