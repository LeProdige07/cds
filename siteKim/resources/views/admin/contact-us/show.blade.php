<div class="modal fade" id="ModalShow{{ $contact->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Détails du contact</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('Names') }}:</strong>
                        {{ $contact->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('Email') }}:</strong>
                        {{ $contact->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('Phone') }}:</strong>
                        {{ $contact->phone }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('Sujet') }}:</strong>
                        {{ $contact->subject }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('Message') }}:</strong>
                        {{ $contact->message }}
                    </div>
                </div>
                {!! Form::model($contact, ['method' => 'PATCH', 'route' => ['contacts.update', $contact->id]]) !!}
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('Lu') }}:</strong>
                        <input type="checkbox" name="statut" value=1 @if ($contact->statut == 1) checked @endif>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn gray btn-outline-secondary"
                        data-dismiss="modal">{{ __('Quitter') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('Actualiser') }}</button>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- .col-md-12 -->
        </div>
    </div>
</div>
