{!! Form::model($faq, [
    'method' => 'PATCH',
    'route' => ['faqs.update', $faq->id],
    'enctype' => 'multipart/form-data',
]) !!}
@csrf
<div class="modal fade text-left" id="ModalEdit{{ $faq->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modification de l'utilisateur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('Question') }}:</strong>
                        {!! Form::text('question', null, ['placeholder' => 'Question', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('Réponse') }}:</strong>
                        {!! Form::text('reponse', null, ['placeholder' => 'Réponse', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn gray btn-outline-secondary"
                    data-dismiss="modal">{{ __('quitter') }}</button>
                <button type="submit" class="btn btn-warning">{{ __('Edit') }}</button>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
