 <!-- exibe os erros do sistema ao usuario -->
@if (@$errors->any())
<script type="text/javascript">
    window.onload = function() {

        @include('layouts.toastr')

        // mensagem de alerta ao usuario
        toastr["{{ @$errors->getMessages()['message_type'][0] }}"]("{!! @$errors->getMessages()['message_name'][0] !!}");

    };
</script>
@include('layouts.console_logs')
@endif
