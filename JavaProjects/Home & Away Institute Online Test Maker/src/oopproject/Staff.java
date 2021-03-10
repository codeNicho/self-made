package oopproject;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.time.LocalDate;
import java.util.InputMismatchException;
import java.util.Scanner;

import oopproject.Date;
import oopproject.Name;

public class Staff extends User{
	private String Faculty;
	private String Department;
	Date dateEmployed = new Date();
	Name staffName = new Name();
	
	public Staff(){ // Using default constructor to initialize attributes
		Id = 0;
		Faculty = "";
		Department = "";
		Password = "";
	}

	public String getFaculty() {
		return Faculty;
	}

	public void setFaculty(String faculty) {
		Faculty = faculty;
	}

	public String getDepartment() {
		return Department;
	}

	public void setDepartment(String department) {
		Department = department;
	}
	public void printMessage(){//method used to demonstrate polymorphism and overriding between User and Staff classes
		System.out.println("We are inside the Staff Section");
	}
	
	public void setTest(){ //method used by a staff member to set a test
		System.out.println("Hello Staff Member, Tests are generated here!");
		System.out.println("Here is a list of courses and their codes");
		System.out.println("\t\tMATHEMATICS[MAT101]\n\t\tENGLISH[E101]\n\t\tINFORMATION_TECHNOLOGY[IT101]\n\t\tPHYSICS[PHS101]\n\t\tPSYCHOLOGY[PSY101]\n\t\tGEOGRAPHY[GEO101]\n\t\tENGINEERING_PHYSICS_[EP101]\n\t\tDATABASE_DESIGN[DD101]");
		//course code, course name and test date

		Scanner courseinfo = new Scanner(System.in);
		try{
			FileWriter fileinfo = new FileWriter("settest.txt", true);//creating a file writer object to append the questions to a file
		System.out.println("Enter the name of the course you wish to set a test for");
		String coursename = courseinfo.next();
		System.out.println("Enter the course code");
		String coursecode = courseinfo.next().toUpperCase();
		//name
		System.out.print("The current date is ");
		System.out.println(java.time.LocalDate.now()); //getting current system time when the test is being set, the value could only be displayed and not stored in a file
		System.out.println("Enter the current date <format yyyy-mm-dd>");//prompting the user to enter the date after we displayed it to him/her above
		String time = courseinfo.next();
		fileinfo.write(DriverClass.STAFFID+ " ");//the value for staff id was set from the login screen whichever value was used to login is in this variable
		fileinfo.write(DriverClass.STAFFID+"-"+coursecode+"-"+time);
		fileinfo.write("\r\n");
		if(coursecode.equals("MAT101")){//selecting which test question bank the answers are taken from to set the test
			Scanner filescanner2 = new Scanner(new File("mathtest.txt"));
			while(filescanner2.hasNext()){ //reading the questions and answers from the selected question bank file
				String questions = filescanner2.nextLine();
				String answers = filescanner2.nextLine().trim();
				fileinfo.write(questions); //writing each questions and answers to the new set test file, these are coming from the question bank
				fileinfo.write("\r\n");
				fileinfo.write(answers);
				fileinfo.write("\r\n");
			}
		}
		
		else if(coursecode.equals("E101")){
			Scanner filescanner2 = new Scanner(new File("englishtest.txt"));
			while(filescanner2.hasNext()){
				String questions = filescanner2.nextLine();
				String answers = filescanner2.nextLine().trim();
				fileinfo.write(questions);
				fileinfo.write("\r\n");
				fileinfo.write(answers);
				fileinfo.write("\r\n");
			}
		}
		
		else if(coursecode.equals("IT101")){
			Scanner filescanner2 = new Scanner(new File("infotechtest.txt"));
			while(filescanner2.hasNext()){
				String questions = filescanner2.nextLine();
				String answers = filescanner2.nextLine().trim();
				fileinfo.write(questions);
				fileinfo.write("\r\n");
				fileinfo.write(answers);
				fileinfo.write("\r\n");
			}
		}
		
		else if(coursecode.equals("PHS101")){
			Scanner filescanner2 = new Scanner(new File("physicstest.txt"));
			while(filescanner2.hasNext()){
				String questions = filescanner2.nextLine();
				String answers = filescanner2.nextLine().trim();
				fileinfo.write(questions);
				fileinfo.write("\r\n");
				fileinfo.write(answers);
				fileinfo.write("\r\n");
			}
		}
		
		else if(coursecode.equals("PSY101")){
			Scanner filescanner2 = new Scanner(new File("psychologytest.txt"));
			while(filescanner2.hasNext()){
				String questions = filescanner2.nextLine();
				String answers = filescanner2.nextLine().trim();
				fileinfo.write(questions);
				fileinfo.write("\r\n");
				fileinfo.write(answers);
				fileinfo.write("\r\n");
			}
		}
		
		else if(coursecode.equals("GEO101")){
			Scanner filescanner2 = new Scanner(new File("geographytest.txt"));
			while(filescanner2.hasNext()){
				String questions = filescanner2.nextLine();
				String answers = filescanner2.nextLine().trim();
				fileinfo.write(questions);
				fileinfo.write("\r\n");
				fileinfo.write(answers);
				fileinfo.write("\r\n");
			}
		}
		
		else if(coursecode.equals("EP101")){
			Scanner filescanner2 = new Scanner(new File("engineeringtest.txt"));
			while(filescanner2.hasNext()){
				String questions = filescanner2.nextLine();
				String answers = filescanner2.nextLine().trim();
				fileinfo.write(questions);
				fileinfo.write("\r\n");
				fileinfo.write(answers);
				fileinfo.write("\r\n");
			}
		}
		
		else if(coursecode.equals("DD101")){
			Scanner filescanner2 = new Scanner(new File("databasetest.txt"));
			while(filescanner2.hasNext()){
				String questions = filescanner2.nextLine();
				String answers = filescanner2.nextLine().trim();
				fileinfo.write(questions);
				fileinfo.write("\r\n");
				fileinfo.write(answers);
				fileinfo.write("\r\n");
			}
		}else{
			System.out.println("Invalid course code entered, see course list");
			setTest();
		}
		
		fileinfo.close();
		
		}catch(IOException e){
			System.err.println("File could not be opened");
		}
		catch(InputMismatchException i){
			System.err.println("Invalid data type entered");
		}
		
	}
	
	public void viewTestResults(){//staff utilize this method to view test results
		try{
		Scanner staffscanner = new Scanner(new File("testresults.txt"));
		while(staffscanner.hasNext()){
			int id = staffscanner.nextInt();
			String coursecode = staffscanner.next();
			String date = staffscanner.next();
			String lettergrade = staffscanner.next();
			String remarks = staffscanner.next();
			System.out.println("Student ID: " +id);
			System.out.println("Course Code: "+coursecode);
			System.out.println("Date of test is :"+date);
			System.out.println("Letter Grade: "+lettergrade);
			System.out.println("Remarks: "+remarks);
			System.out.println("\n\r");
		}
		}catch(FileNotFoundException p){
			System.out.println("File not found");
			
		}
	}
	
	public void exitSystem(){
		
	}
}













