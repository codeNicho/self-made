package oopproject;

public class Course {
	private String Code;
	private String Name;
	private String Description;
	private int Credits;
	private int Duration;
	
	public Course(){
		Code = "";
		Name = "";
		Description = "";
		Credits = 0;
		Duration = 0;
	}
	
	public String getCode() {
		return Code;
	}
	public void setCode(String code) {
		this.Code = code;
	}
	public String getName() {
		return Name;
	}
	public void setName(String name) {
		Name = name;
	}
	public String getDescription() {
		return Description;
	}
	public void setDescription(String description) {
		Description = description;
	}
	public int getCredits() {
		return Credits;
	}
	public void setCredits(int credits) {
		Credits = credits;
	}
	public int getDuration() {
		return Duration;
	}
	public void setDuration(int duration) {
		Duration = duration;
	}
		
}
