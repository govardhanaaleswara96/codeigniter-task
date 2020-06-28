// 1. user created api
  method : post
  url : http://localhost/books/api/User/createUser
	body: {userName : string ,userMail : string , userPass : string , userLevel : number} // user level ( admin - 1 , user - 2 )
	
	
// 2. login api
  method : post
  url : http://localhost/books/api/User/logIn
	body: {userMail : string , userPass : string }	
	
	
// 3. create book api
  method : post
  url : http://localhost/books/api/Admin/create
	body: { name : string , price : number , userId:number }	// admin only create books
	
	
// 4. get books api
  method : get
  url : http://localhost/books/api/Admin/view
	body: { name : string , price : number , userId:number }	


// 5. edit book api
  method : post
  url : http://localhost/books/api/Admin/edit
	body: { name : string , price : number , userId : number, bookId : string }	// admin only edit books
	


// 6. delete book api
  method : post
  url : http://localhost/books/api/Admin/delete
	body: { userId : number, bookId : string }	// admin only delete books
	


// 7. delete book api
  method : post
  url : http://localhost/books/api/Admin/delete
	body: { userId : number, bookId : string }	// admin only delete books	
	


// 8. subscribe book api
  method : post
  url : http://localhost/books/api/Subscribe 
	body: { userId : number, bookId : string }	
	
	
// 9. subscribe counts & books counts api
  method : get
  url : http://localhost/books/api/Subscribe/dashboard


// 10. user books and subscribe details api
  method : get
  url : http://localhost/books/api/Subscribe/UserSubscribeDetails
