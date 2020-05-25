# Test API Symfony!

# POST /subscription
In body off Http cal use this values.
```json
{
	"begin_date" : "2020-02-12",
	"end_date" : "2020-01-10",
	"contact" : {
		"name" : "testName",
		"first_name" : "testFirstName"
	},
	"product" : {
		"label" : "label"
	}
}
```
# GET /subscription/{idContact}
Get subscription with idContact

# PUT /subscription/{idSubscription}
Put subscription with idSubscription use this values.
```json
{
	"id" : idSubscription,
	"begin_date" : "2020-02-22",
	"end_date" : "2020-01-22",
	"contact" : {
		"id" : idContact,
		"name" : "testName_2",
		"first_name" : "testFirstName_2"
	},
	"product" : {
		"id": idLabel,
		"label" : "label2"
	}
}
```
Change idSubscription, idContact, idLabel with the id of each object in data base. 

# DELETE /subscription/{idSubscription}
Get subscription with idSubscription.