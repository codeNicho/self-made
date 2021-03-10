package oopproject;

public class Name {
	private String fName;
	private String lName;
	
	public Name(){ // Using default constructor to initialize attributes
		fName = "";
		lName = "";
	}
	
	/*public Name(String fName, String lName) { //Primary constructor will be needed for user input
		this.fName = fName;
		this.lName = lName;
	}*/

	public void setfName(String fname){
		fName = fname;
	}
	
	public String getfName(){
		return fName;
	}
	
	public void setlName(String lname){
		lName = lname;
	}
	
	public String getlName(){
		return lName;
	}

}
