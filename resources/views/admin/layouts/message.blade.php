<article
    id="delete"
    data-text="{{ trans('message.cancelBooking') }}"
    data-confirm="{{ trans('message.continue') }}"
    data-cancel="{{ trans('message.close') }}"
>
</article>
<script type="text/javascript" src="{{ mix('/js/formDeleteConfirm.js') }}"></script>
@if (Session::has('updated'))
    <article
        id="message"
        data-text="{{  Session::get('updated') }}"
    >
    </article>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/toastSucess.js') }}">
    </script>
@elseif (Session::has('created'))
    <article
        id="message"
        data-text="{{  Session::get('created') }}"
    >
    </article>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/toastSucess.js') }}">
    </script>
@elseif (Session::has('deleted'))
    <article
        id="message"
        data-text="{{  Session::get('deleted') }}"
        data-icon="{{  Session::get('icon') }}"
    >
    </article>
    <script type="text/javascript" src="{{ mix('/js/complete.js') }}">
    </script>
@endif
