#users
Wall
Wall-2


#roles
Manager
Adm
Editor
Publish


#users <-> roles
Wall -> Manager, Publish


#permissions
view_post
edit_post
delete_post

#roles <-> permissions
Manager ->  edit_post, delete_post


#view 
@can('edit_post', $post)

	//...
	
@endcan
