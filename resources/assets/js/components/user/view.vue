<template>
	<div class="row">

		<div v-if="notFound" class="col-md-12">
			<div  class="alert alert-warning">
				{{ message }}
			</div>			
		</div>

        <div v-if="! notFound" class="col-xs-12 col-sm-6 col-md-12">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-12">
                        <h4>
                            {{ user.name }}
                        </h4>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>{{ user.email }}
                            <br />

                            <i class="glyphicon glyphicon-gift"></i>{{ user.created_at }}</p>
                        <!-- Split button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <router-link :to="{ name: 'userIndex' }">Back to index</router-link>
        </div>
    </div>
</template>

<script>
	export default {
		data() {
			return {
				notFound: false,
				message: '',
				user: []
			}
		},

		mounted() {
			// get by user id
			const url = `/user/${this.$route.params.id}`;
			axios.get(url).then(response => {
				this.user = response.data;
				this.notFound = false;
			}).catch(error => {
				if (error.response.status == 404) {
					this.notFound = true;
					this.message = error.response.data.message;
				}
			});
		}
	}
</script>

<style type="text/css" scoped>
body{
	padding-top:30px;
}

.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

small {
	display: block;
	line-height: 1.428571429;
	color: #999;
}
</style>