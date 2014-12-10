Update custorder
set 	subtotal = subtotal + 5.00 ,
	salestax = salestax + 0.00 ,
	shipping = shipping + 0.00,
	total = total + 10.00,
	checkedout =  '0',
	lastupdated = CURRENT_TIMESTAMP 
WHERE o_id = 8;