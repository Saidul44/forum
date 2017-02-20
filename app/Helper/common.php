<?php
	function user_info($user_id, $field) {
		$user = \App\User::find($user_id);
		if($user) {
			return $user->{$field};
		}

		return 'Not Exist';
	}

	function count_reply($comment_id, $thread_id) {
		return \App\Models\Comment\Comment::where('thread_id', $thread_id)->where('comment_id', $comment_id)->count();
	}
?>