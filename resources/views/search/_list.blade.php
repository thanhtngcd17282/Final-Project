@each('search._show', $videos, 'video')


<div class="d-flex justify-content-center">
    {{ $videos->links() }}
</div>
