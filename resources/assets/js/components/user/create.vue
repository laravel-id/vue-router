<template>
	<div>
		<div v-if="message" class="alert alert-success">
			{{ message }}
		</div>

		<form @submit.prevent="store" action="/user" method="post">
			<div :class="['form-group', errors.name ? 'has-error' : '']">
				<label>Full name</label>
				<input v-model="state.name" type="text" class="form-control">
				<span v-if="errors.name" class="label label-danger">{{ errors.name[0] }}</span>
			</div>

			<div :class="['form-group', errors.email ? 'has-error' : '']">
				<label>Email</label>
				<input v-model="state.email" type="email" class="form-control">
				<span v-if="errors.email" class="label label-danger">{{ errors.email[0] }}</span>
			</div>

			<div class="form-group">
				<button class="btn btn-primary">Submit</button>
				<router-link :to="{ name: 'userIndex' }">Back to index</router-link>
			</div>
		</form>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				errors: [],
				user: [],
				state: {
					name: '',
					email: ''
				}
			}
		},

		methods: {
			store(e) {
				axios.post(e.target.action, this.state).then(response => {
					this.errors = [];

					this.state = {
						name: '',
						email: ''
					}

					this.message = 'User has been created.';
				}).catch(error => {
					if (! _.isEmpty(error.response)) {
						if (error.response.status = 422) {
							this.errors = error.response.data;
						}
					}
				});
			}
		}
	}
</script>