function computCost() {
    var N95 = document.getElementById("idN95").value;
    var surgical = document.getElementById("idsurgical").value;
    var surgicalN95 = document.getElementById("idsurgicalN95").value;

    document.getElementById("N95cost").value = 5.0 * N95;

    document.getElementById("surgicalcost").value = 1.0 * surgical;

    document.getElementById("surgicalN95cost").value = 6.0 * surgicalN95;

    document.getElementById("total").value = (5.0 * N95) + (1.0 * surgical) + (6.0 * surgicalN95);
}

