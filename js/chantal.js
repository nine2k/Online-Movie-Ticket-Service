function showPurchases(){

	var purchasesButton = document.getElementById("viewAllPurchasesButton");
	var allPurchases = document.getElementsByClassName('allPurchases');
	var upcomingTitle = document.getElementById("upcoming");
	var n = allPurchases.length;
	if(purchasesButton.innerHTML == "View All Purchases"){
		for (var i = 0; i < n; i++){
		    allPurchases[i].style.display='block';
		}
		purchasesButton.innerHTML = "Show Less";
		upcomingTitle.innerHTML = "All Purchases:";
	}else{
		for (var i = 0; i < n; i++){
		    allPurchases[i].style.display='none';
		}
		purchasesButton.innerHTML = "View All Purchases";
		upcomingTitle.innerHTML = "Upcoming Movies:";
	}
}

function colourStars(x){
	var i = 9 - Math.floor(x);
	for(var j = 9; j > i; j--){
		
		document.getElementsByClassName('a')[j].style.color = "#FF5722";
		//document.getElementsByClassName('a')[j].style.position = "absolute";	
	}
	
}

function colourStars2(x){
	var stars = document.getElementsByClassName('rating-full')[0];
	var i = Math.floor(x);
	for(var j = 0; j < i; j++){
		stars.innerHTML += "<span >☆</span>";
	}
	
}

function getTime(x){

	return x.substring(11,16);
}

function getDate(x){
	var date = x.substring(8,10) + " / " + x.substring(5,7);
	if(parseInt(x.substring(0,5) < 2018)){
		date += " / " + x.substring(0,5);
	}
	return date;
}



function hideCard(cardNum){
	var hiddenCard = "**** **** **** " + cardNum.substring(12,);
	return hiddenCard;
}

function changeTotal(seats){
	var total = document.getElementById('incSum');
	var tickets = document.getElementById('numTickets').value
	var numTickets = parseInt(tickets);
	var purchaseButton = document.getElementById('purchaseButton');
	total.innerHTML = numTickets * 8.5;
	console.log(typeof numTickets);
	if(Number.isInteger(numTickets) && numTickets > 0 && seats - numTickets >= 0){
		total.innerHTML = numTickets * 8.5
		purchaseButton.disabled = false;
	}else{
		total.innerHTML = 0;
		purchaseButton.disabled = true;
	} 
}

function confirmDelete(){
	var result = confirm("Are you sure you want to delete this member?");
	return result;
}

function theatreRadios(num){
	var div = document.getElementById("hidden-radio");
	div.innerHTML = "";
	for(var i = 0; i < num; i++){
		div.innerHTML += "<label class='radio-container'>" + (i + 1) +"<input type='radio' name='theatre_num' value='" + (i + 1) + "'><span class='checkmark'></span></label>";
	}
}

function generateAccount(){
	var x = "";
	for(var i = 0; i < 16; i++){
		x += parseInt((Math.random())*10)
	}
	return x;
}

