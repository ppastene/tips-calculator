<div class="columns is-mobile is-centered">
    <div class="column is-half">
        <h1 class="title">Calculadora de propinas</h1>
        <form>
            {{ csrf_field() }}
            <div class="field">
                <label class="label">Monto a pagar</label>
                <div class="control">
                    <input id="amount" class="input" wire:model="amount" type="text" placeholder="Monto a pagar">
                    @error('amount') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="field">
                <label class="label">Porcentaje de propina</label>
                <div class="control">
                    <input id="percentage" class="input" wire:model="percentage" type="text" placeholder="Porcentage de propina">
                    @error('percentage') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">Total Propina</label>
                        <div class="control">
                            <input class="input" wire:model="tip" type="text" placeholder="Propina" readonly>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="field">
                        <label class="label">Total a pagar</label>
                        <div class="control">
                            <input class="input" wire:model="total" type="text" placeholder="Total" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        function setInputFilter(textbox, inputFilter) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                textbox.addEventListener(event, function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
                });
            });
        }
        setInputFilter(document.getElementById("amount"), function(value) {
            return /^-?\d*$/.test(value);
        });
        setInputFilter(document.getElementById("percentage"), function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 100);
        });
    })
</script>
@endpush
{{-- The best athlete wants his opponent at his best. --}}
