<li>
    <div class="space-y-5 prose text-justify max-w-none">

        <h2 class="not-prose font-bold">
            <a class="hover:text-indigo-700 transition-colors duration-199"
                href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
        </h2>
        <div>{{ $post->excerpt }}</div>
        <x-post-meta :post="$post" />
    </div>
</li>
