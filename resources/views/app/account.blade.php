@extends('layouts.app')

@section('content')
<h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
	<i data-feather="user" width="64" height="64"></i>
	Your <span class="border-b bc-indigo bw-4">Account</span>
</h2>
<div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
	<div class="w-100pc md-w-100pc">
		<section class="p-0 md-p-5">
			<div class="flex flex-wrap">
				<div class="w-100pc md-w-33pc p-3">
					<div class="block p-5 bg-indigo-lightest-10">
						<p class="fw-600 white fs-l2 mt-3">
							{{ $user->name }}
						</p>
						<div class="indigo fs-m2 my-4"><i data-feather="user" width="12" height="12"></i> {{ $user->email }}</div>
					</div>
				</div>
				<div class="w-100pc md-w-33pc p-3">
					<div class="block p-5 bg-indigo-lightest-10">
						<p class="fw-600 white fs-l2 mt-3">
							{{ $user->total_scribbls }}
						</p>
						<div class="indigo fs-m2 my-4"><i data-feather="edit-2" width="12" height="12"></i> Total Scribbls</div>
					</div>
				</div>
				<div class="w-100pc md-w-33pc p-3">
					<div class="block p-5 bg-indigo-lightest-10">
						<p class="fw-600 white fs-l2 mt-3">
							{{ $user->created_at->diffForHumans() }}
						</p>
						<div class="indigo fs-m2 my-4"><i data-feather="clock" width="12" height="12"></i> Time Created</div>
					</div>
				</div>
				<div class="w-100pc md-w-50pc p-3">
					<form method="POST" action="{{ route('app.account.email') }}"
						class="block p-5 bg-indigo-lightest-10">
						@csrf
						<p class="fw-600 white fs-l2 mt-3">Update <span class="border-b bc-indigo bw-4">Email</span>
						</p>
						<div class="flex my-5">
							<input id="email" name="email" required autocomplete="email" type="email" placeholder="New Email"
								class="form-control @error('email') is-invalid @enderror input-lg flex-grow-1 bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-s3 py-5"
							/>
						</div>
						<button type="submit" class="button-lg w-100pc bg-indigo indigo-lightest bw-0 fw-300 fs-s3">
						Update
						</button>
					</form>
				</div>
				<div class="w-100pc md-w-50pc p-3">
					<form method="POST" action="{{ route('app.account.delete') }}"
						class="block p-5 bg-indigo-lightest-10">
						@csrf
						<p class="fw-600 white fs-l2 mt-3">
							Delete <span class="border-b bc-red bw-4">Account</span>
						</p>
						<p class="fw-600 white fs-s1 mt-3 mb-3">
							Deleting your Scribbl account will result in PERMENANT data loss.
							All scribbls associated with your account will be deleted.
							Are you sure you wish to continue?
						</p>
						<button type="submit" class="button-lg w-100pc bg-red red-lightest bw-0 fw-300 fs-s3">
						Delete Account
						</button>
					</form>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection