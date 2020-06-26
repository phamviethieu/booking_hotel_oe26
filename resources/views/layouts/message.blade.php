@if (Session::has('message'))
    <article
        id="message"
        data-text="{{ Session::get('message') }}"
        data-icon="{{ Session::get('icon') }}"
    >
    </article>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/complete.js') }}"></script>
@endif
<script src="{{ asset('bower_components/style_project1/js/formDeleteConfirm.js') }}"></script>
