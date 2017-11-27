<spark-subscribe-braintree :user="user" :team="team"
                :plans="plans" :billable-type="billableType" inline-template>

    <div>
        <!-- Common Subscribe Form Contents -->
        @include('spark::settings.subscription.subscribe-common')

        <!-- Billing Information -->
        <div class="card card-default" v-show="selectedPlan">
            <div class="card-header"><i class="fa fa-btn fa-credit-card"></i> {{__('Billing Information')}}</div>

            <div class="card-body">
                <!-- Generic 500 Level Error Message / Stripe Threw Exception -->
                <div class="alert alert-danger" v-if="form.errors.has('form')">
                    {{__('We had trouble validating your card. It\'s possible your card provider is preventing us from charging the card. Please contact your card provider or customer support.')}}
                </div>

                <form role="form">
                    <!-- Braintree Container -->
                    <div id="braintree-subscribe-container" class="m-b-md"></div>

                    <!-- Subscribe Button -->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" :disabled="form.busy">
                            <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i> {{__('Subscribing')}}
                            </span>

                            <span v-else>
                                {{__('Subscribe')}}
                            </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</spark-subscribe-braintree>
