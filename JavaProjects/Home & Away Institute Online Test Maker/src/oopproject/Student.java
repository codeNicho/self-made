package oopproject;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.text.DecimalFormat;
import java.time.LocalDate;
import java.util.Scanner;

public class Student extends User {
	Name studName = new Name();
	private String Address;
	Date dateEnrolled = new Date();
	private String contactNum;
	private String programmeEnr;
	
	public Student(){ //Default constructor
		Id = 0;
		Address= "";
		contactNum = "";
		programmeEnr = "";
		Password = "";
	}
	

	public String getAddress() {
		return Address;
	}

	public void setAddress(String address) {
		Address = address;
	}

	public String getContactNum() {
		return contactNum;
	}


	public void setContactNum(String contactNum) {
		this.contactNum = contactNum;
	}


	public void setProgrammeEnr(String programmeenr) {
		this.programmeEnr = programmeenr;
	}
	
	public String getProgrammeEnr() {
		return programmeEnr;
	} 

	public void enroll(){
		
	}
	
	public void selectCourse(){
		
	}
	public void printMessage(){//method used to demonstrate overriding between User and Student Class
		System.out.println("We are inside the Student section");
	}
	
	public void takeTest(){
		System.out.println("Hello Student, Tests are taken here!");
		System.out.println("Here is a list of all courses for the programme you are enrolled in");
		try{
		Scanner studscanner = new Scanner(new File("studentrecord.txt"));//getting and displaying the courses a student can take a test on
		while(studscanner.hasNext()){
			int studId = studscanner.nextInt();
			String studPassword = studscanner.next();
			String studFName = studscanner.next();
			String studLName = studscanner.next();
			int studDayEnrolled = studscanner.nextInt();
			int studMonthEnrolled = studscanner.nextInt();
			int studYearEnrolled = studscanner.nextInt();
			String studAddress = studscanner.next();
			String studEnrollStatus = studscanner.next();
			String programmeEnroll = studscanner.next();
			if(DriverClass.STUDENTID==studId){ 
				if(programmeEnroll.equals("CERTIFICATE")){
					System.out.println("MATHEMATICS");
					System.out.println("ENGLISH");
					System.out.println("INFORMATION_TECHNOLOGY");
					System.out.println("PHYSICS");
				}
				else if(programmeEnroll.equals("DIPLOMA")){
					System.out.println("MATHEMATICS");
					System.out.println("ENGLISH");
					System.out.println("INFORMATION_TECHNOLOGY");
					System.out.println("PHYSICS");
					System.out.println("PSYCHOLOGY");
					System.out.println("GEOGRAPHY");
				}
				else if(programmeEnroll.equals("ASSOCIATE")){
					System.out.println("MATHEMATICS");
					System.out.println("ENGLISH");
					System.out.println("INFORMATION_TECHNOLOGY");
					System.out.println("PHYSICS");
					System.out.println("PSYCHOLOGY");
					System.out.println("GEOGRAPHY");
					System.out.println("ENGINEERING_PHYSICS");
					System.out.println("DATABASE_DESIGN");
				}
			}
		}
		studscanner.close();
		}catch(FileNotFoundException i){
			System.out.println("File cannot be opened");
		}
		try{
		Scanner coursescanner = new Scanner(System.in);
		System.out.println("Enter the name of the course you wish to do a test on");
		String course = coursescanner.next().toUpperCase(); //here we decide what course to select based on the student's input
		String coursecode ="";
		Scanner fileobj = null;
		if(course.equals("MATHEMATICS")){
			  coursecode = "MAT101";
			 fileobj = new Scanner(new File("mathtest.txt"));
		}else if(course.equals("ENGLISH")){
			 coursecode = "E101";
			 fileobj = new Scanner(new File("englishtest.txt"));
		}else if(course.equals("INFORMATION_TECHNOLOGY")){
			  coursecode = "IT101";
			 fileobj = new Scanner(new File("infotechtest.txt"));
		}else if(course.equals("PHYSICS")){
			 coursecode = "PHS101";
			 fileobj = new Scanner(new File("physicstest.txt"));
		}else if(course.equals("PSYCHOLOGY")){
			 coursecode = "PSY101";
			 fileobj = new Scanner(new File("psychologytest.txt"));
		}else if(course.equals("GEOGRAPHY")){
			 coursecode = "GEO101";
			 fileobj = new Scanner(new File("geographytest.txt"));
		}else if(course.equals("ENGINEERING_PHYSICS")){
			 coursecode = "EP101";
			 fileobj = new Scanner(new File("engineeringtest.txt"));
		}else if(course.equals("DATABASE_DESIGN")){
			 coursecode = "DD101";
			 fileobj = new Scanner(new File("databasetest.txt"));
		}else{
			System.out.println("Invalid course name");
		}
		FileWriter testtaken = new FileWriter("testtaken.txt", true);
		testtaken.write(DriverClass.STUDENTID+ " ");
		testtaken.write(coursecode+ " ");
		System.out.print("The current date is ");
		System.out.println(java.time.LocalDate.now()); 
		System.out.println("Enter the current date shown above <format yyyy-mm-dd>");
		String date1 = coursescanner.next();
		testtaken.write(date1 + " ");
		testtaken.close();
		FileWriter testresults = new FileWriter("testresults.txt", true);
		testresults.write(DriverClass.STUDENTID+ " ");
		testresults.write(coursecode+ " ");
		String question;
		String ans;
		double correctCount = 0;
		Scanner userans = new Scanner(System.in);
		
		System.out.println("Enter the Letter corresponding to the answers");
		System.out.println("========================================================================================");
		System.out.println("=                               EXAMPLE                                              ==");
		System.out.println("=  The numeral 4 is what kind of number? A. Odd -- B. Even -- C. Prime -- D. Natural ==");
		System.out.println("=  The answer/letter to enter would be B                                             ==");
		System.out.println("========================================================================================\n");
		System.out.println("\t\t\tYou may now BEGIN!");
		while (fileobj.hasNext()) {
			question = fileobj.nextLine();
			ans = fileobj.nextLine().trim();
			System.out.println(question);
			System.out.println("Enter Your Answer");
			String useransew = userans.next(); 
			String result = useransew.toUpperCase();
			if(result.equals(ans)){
				System.out.println("Correct Answer!");
				correctCount++;
			}else{
				System.out.println("Incorrect Answer");
			}
			
		}
		double percentage = (correctCount/12)*100;
		DecimalFormat df = new DecimalFormat("#.00"); 
		
		System.out.println("You got " +correctCount+ " out of 12 questions correct");
		if(correctCount >= 6){
			System.out.println("You Passed with a Score of "+df.format(percentage)+ "%");
		}else{
			System.out.println("You failed with a Score of "+df.format(percentage)+ "%");
		}
		testresults.write(date1 + " ");
		if (percentage >= 80) {
		    testresults.write("A"+ " ");
		    testresults.write("Pass");
		    testresults.write("\r\n");
		} else if (percentage >= 70 && percentage <= 79) {
			testresults.write("B"+ " ");
		    testresults.write("Pass");
		    testresults.write("\r\n");
		} else if (percentage >= 60 && percentage <= 69) {
			testresults.write("C"+ " ");
		    testresults.write("Pass");
		    testresults.write("\r\n");
		} else if (percentage >= 50 && percentage <= 59) {
			testresults.write("D"+ " ");
		    testresults.write("Pass");
		    testresults.write("\r\n");
		} else if (percentage >= 40 && percentage <= 49) {
			testresults.write("E"+ " ");
		    testresults.write("FAIL");
		    testresults.write("\r\n");
		} else {
			testresults.write("F"+ " ");
			testresults.write("FAIL");
			testresults.write("\r\n");
		}
		testresults.close();
		}catch(FileNotFoundException a){
				System.out.println("File cannot be found");
			}
		catch(IOException j){
			System.err.println("File could not be opened");
		}
		
		
	}
	
	public void viewTestResults(){
		try{
			Scanner staffscanner = new Scanner(new File("testresults.txt"));
			
			while(staffscanner.hasNext()){
			
				int id = staffscanner.nextInt();
				String coursecode = staffscanner.next();
				String date = staffscanner.next();
				String lettergrade = staffscanner.next();
				String remarks = staffscanner.next();
				if(DriverClass.STUDENTID==id){
				System.out.println("Student ID: " +id);
				System.out.println("Course Code: "+coursecode);
				System.out.println("Date of test is :"+date);
				System.out.println("Letter Grade: "+lettergrade);
				System.out.println("Remarks: "+remarks);
				
				if(coursecode.equals("MAT101")){
					 System.out.println("Course Name: MATHEMATICS");
		
				}else if(coursecode.equals("E101")){
					System.out.println("Course Name: English");
				}else if(coursecode.equals("IT101")){
					System.out.println("Course Name: INFORMATION_TECHNOLOGY");
				}else if(coursecode.equals("PHS101")){
					System.out.println("Course Name: PHYSICS");
				}else if(coursecode.equals("PSY101")){
					System.out.println("Course Name: PSYCHOLOGY");
				}else if(coursecode.equals("GEO101")){
					System.out.println("Couse Name: GEOGRAPHY");
				}else if(coursecode.equals("EP101")){
					System.out.println("Couse Name: MATHEMATICS");
				}else if(coursecode.equals("DD101")){
						System.out.println("Couse Name: DATABASE_dESIGN");
				}else{
					System.out.println("Invalid course name");
				}
				System.out.println("\n\r");
			}
			}
			
		}catch(FileNotFoundException p){
			System.out.println("File not found");

		}
	}
	
	public void exitSystem(){
		
	}
	
	
}
