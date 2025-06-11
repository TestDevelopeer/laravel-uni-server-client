@props(['id', 'title', 'message'])
<div class="toasts-container">
    <div class="toast fade hide mb-3" data-autohide="true" id="{{$id}}" data-bs-delay="2000">
        <div class="toast-header">
            <i class="far fa-bell text-muted me-2"></i>
            <strong class="me-auto">{{$title}}</strong>
            <small>только что</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            {{$message}}
        </div>
    </div>
</div>
