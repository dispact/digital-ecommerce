<div x-data="{ showLogin: false }" 
	x-show="showLogin" 
	@toggle-login.window="showLogin = true;"
	class="fixed z-10 inset-0 overflow-y-auto" 
	aria-labelledby="modal-title" 
	role="dialog" 
	aria-modal="true"
>
	<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
		<!--
			Background overlay, show/hide based on modal state.

			Entering: "ease-out duration-300"
				From: "opacity-0"
				To: "opacity-100"
			Leaving: "ease-in duration-200"
				From: "opacity-100"
				To: "opacity-0"
		-->
		<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

		<!-- This element is to trick the browser into centering the modal contents. -->
		<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

		<!--
			Modal panel, show/hide based on modal state.

			Entering: "ease-out duration-300"
				From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
				To: "opacity-100 translate-y-0 sm:scale-100"
			Leaving: "ease-in duration-200"
				From: "opacity-100 translate-y-0 sm:scale-100"
				To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
		-->
		<div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden 
			shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6"
		>
			<div>
				<h2 class="mb-6 text-center text-2xl font-semibold text-gray-900">
					Log In
				</h2>
				<form wire:submit.prevent="submit" class="space-y-6">
					<div>
						<label for="email" class="block text-sm font-medium text-gray-700 mb-1">
							Email address
						</label>
						<input 
							wire:model="email"
							id="email" 
							name="email" 
							type="email" 
							autocomplete="email" 
							class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
								placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
								sm:text-sm"
							required
						>
					</div>

					<div>
						<label for="password" class="block text-sm font-medium text-gray-700 mb-1">
							Password
						</label>
						<input 
							wire:model="password"
							id="password" 
							name="password" 
							type="password" 
							autocomplete="current-password" 
							class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
								placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
								sm:text-sm"
							required 
						>
					</div>

					<div class="flex items-center justify-between">
						<div class="flex items-center">
							<input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 
								focus:ring-indigo-500 border-gray-300 rounded">
							<label for="remember-me" class="ml-2 block text-sm text-gray-900">
								Remember me
							</label>
						</div>

						<div class="text-sm">
							<a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
								Forgot your password?
							</a>
						</div>
					</div>

					<div>
						<button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent 
							rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 
							focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
						>
							Sign in
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
