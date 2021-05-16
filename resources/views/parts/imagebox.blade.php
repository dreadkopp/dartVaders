<div class="col-12 col-md-4 p-3">
    <img src="{{ $image->b64_img }}" class="img-fluid">
    <hr>
    <h5 > {{ $image->edge_media_to_caption->edges[0]->node->text }}</h5>
</div>
