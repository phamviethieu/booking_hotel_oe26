@if (Session::has('message'))
    <article
        id="message"
        data-text="{{ Session::get('message') }}"
        data-icon="{{ Session::get('icon') }}"
    >
    </article>
    <script type="text/javascript" src="{{ mix('/js/complete.js') }}"></script>
@endif
<script src="{{ mix('/js/formDeleteConfirm.js') }}"></script>
