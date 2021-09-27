<x-app-layout>
	<div class="relative h-screen bg-white overflow-hidden flex" 
		x-data="{
			showGeneral: true,
			showPassword: false,
			show2FA: false,
			showSessions: false,
			showAccount: false,

			clearStates(tabName) {
				this.showGeneral = false;
				this.showPassword = false;
				this.show2FA = false;
				this.showSessions = false;
				this.showAccount = false;
				switch(tabName) {
					case 'general':
						this.showGeneral = true;
						break;
					case 'password':
						this.showPassword = true;
						break;
					case '2fa':
						this.show2FA = true;
						break;
					case 'sessions':
						this.showSessions = true;
						break;
					case 'account':
						this.showAccount = true;
						break;
					default:
						this.showGeneral = true;
				}
			}
		}"
	>
		<main class="flex-1 overflow-y-auto focus:outline-none">
      	<div class="relative max-w-4xl mx-auto md:px-8 xl:px-0">
        		<div class="pt-10 pb-16">
					<div class="px-4 sm:px-6 md:px-0">
						<h1 class="text-3xl font-extrabold text-gray-900">Settings</h1>
					</div>
          		<div class="px-4 sm:px-6 md:px-0">
						<div class="py-6">
							<!-- Tabs -->
              			<div class="lg:hidden">
                			<label for="selected-tab" class="sr-only">Select a tab</label>
								<select id="selected-tab" name="selected-tab" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
									<option x-bind:selected="showGeneral" @click="clearStates('general')">General</option>

									<option x-bind:selected="showPassword" @click="clearStates('password')">Password</option>

									<option>Notifications</option>

									<option>Plan</option>

									<option>Billing</option>

									<option>Team Members</option>
								</select>
              			</div>

              			<div class="hidden lg:block">
                			<div class="border-b border-gray-200">
                  			<nav class="-mb-px flex space-x-8">
										<!-- Current: "border-purple-500 text-purple-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
										<button @click="clearStates('general');"
											:class="showGeneral ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' "
											class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
											General
										</button>

										<button @click="clearStates('password');"
											:class="showPassword ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' "
											class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm cursor-pointer">
											Password
										</button>

										<button @click="clearStates('2fa');"
											:class="show2FA ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' "
											class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm cursor-pointer">
											2FA
										</button>

										<button @click="clearStates('sessions');"
											:class="showSessions ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' "
											class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm cursor-pointer">
											Browser Sessions
										</button>

										<button @click="clearStates('account');"
											:class="showAccount ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' "
											class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm cursor-pointer">
											Account
										</button>
									</nav>
								</div>
							</div>

							
							<div x-show="showGeneral" class="mt-10">
								@if (Laravel\Fortify\Features::canUpdateProfileInformation())
									@livewire('profile.update-profile-information-form')
								@endif             	
							</div>

							<div x-show="showPassword" class="mt-10">
								@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
									<div class="mt-10 sm:mt-0">
										@livewire('profile.update-password-form')
									</div>
								@endif              	
							</div>

							<div x-show="show2FA" class="mt-10">
								@if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
									<div class="mt-10 sm:mt-0">
										@livewire('profile.two-factor-authentication-form')
									</div>
								@endif
							</div>

							<div x-show="showSessions" class="mt-10">
								<div class="mt-10 sm:mt-0">
									@livewire('profile.logout-other-browser-sessions-form')
							  </div>
							</div>

							<div x-show="showAccount" class="mt-10">
								@if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
									<div class="mt-10 sm:mt-0">
										@livewire('profile.delete-user-form')
									</div>
								@endif
							</div>

              		</div>
					</div>
          	</div>
        	</div>
    	</main>
	</div>
</x-app-layout>